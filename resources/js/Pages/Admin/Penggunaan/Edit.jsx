import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";
import YearSelect from "@/Components/YearSelect";
import MonthSelect from "@/Components/MonthSelect";
import AppCombobox from "@/Components/AppCombobox";

export default function PenggunaansEdit({ penggunaan, pelanggan }) {
    const pelangganOptions = pelanggan.map((n) => ({
        value: String(n.id),
        label: `${n.no_kwh} - ${n.nama}`,
    }));

    const { data, setData, put, processing, errors } = useForm({
        pelanggan_id: penggunaan.pelanggan_id || "",
        bulan: penggunaan.bulan || "",
        tahun: penggunaan.tahun || "",
        meter_awal: penggunaan.meter_awal || "",
        meter_akhir: penggunaan.meter_akhir || "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/admin/penggunaan/${penggunaan.id}`);
    };

    return (
        <>
            <Head title={"Edit Penggunaan"} />
            <LayoutApp>
                <PageHeader
                    title="Edit Penggunaan"
                    description="Edit data penggunaan"
                />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Pelanggan</FieldLabel>
                            <AppCombobox
                                items={pelangganOptions}
                                value={String(data.pelanggan_id)}
                                onChange={(val) => setData("pelanggan_id", val)}
                                placeholder="Pilih Pelanggan"
                            />
                            {errors.pelanggan_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.pelanggan_id}
                                </FieldDescription>
                            )}
                        </Field>
                        <div className="grid grid-cols-2 gap-4">
                            <Field>
                                <FieldLabel>Bulan</FieldLabel>
                                <MonthSelect
                                    value={data.bulan}
                                    onChange={(val) => setData("bulan", val)}
                                />
                                {errors.bulan && (
                                    <FieldDescription className="mt-1 text-sm text-red-600">
                                        {errors.bulan}
                                    </FieldDescription>
                                )}
                            </Field>
                            <Field>
                                <FieldLabel>Tahun</FieldLabel>
                                <YearSelect
                                    value={String(data.tahun)}
                                    onChange={(val) => setData("tahun", val)}
                                />
                                {errors.tahun && (
                                    <FieldDescription className="mt-1 text-sm text-red-600">
                                        {errors.tahun}
                                    </FieldDescription>
                                )}
                            </Field>
                            <Field>
                                <FieldLabel>Meter awal</FieldLabel>
                                <Input
                                    type="number"
                                    value={data.meter_awal}
                                    onChange={(e) =>
                                        setData("meter_awal", e.target.value)
                                    }
                                    className={`${errors.meter_awal ? "border-red-500" : ""}`}
                                />
                                {errors.meter_awal && (
                                    <FieldDescription className="mt-1 text-sm text-red-600">
                                        {errors.meter_awal}
                                    </FieldDescription>
                                )}
                            </Field>
                            <Field>
                                <FieldLabel>Meter akhir</FieldLabel>
                                <Input
                                    type="number"
                                    value={data.meter_akhir}
                                    onChange={(e) =>
                                        setData("meter_akhir", e.target.value)
                                    }
                                    className={`${errors.meter_akhir ? "border-red-500" : ""}`}
                                />
                                {errors.meter_akhir && (
                                    <FieldDescription className="mt-1 text-sm text-red-600">
                                        {errors.meter_akhir}
                                    </FieldDescription>
                                )}
                            </Field>
                        </div>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/penggunaan">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
