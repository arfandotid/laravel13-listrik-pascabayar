import { Head, Link, useForm, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";
import AppCombobox from "@/Components/AppCombobox";
import MonthSelect from "@/Components/MonthSelect";
import YearSelect from "@/Components/YearSelect";

export default function PenggunaansCreate() {
    const { pelanggan } = usePage().props;

    const pelangganOptions = pelanggan.map((n) => ({
        value: String(n.id),
        label: `${n.no_kwh} - ${n.nama}`,
    }));

    const { data, setData, post, processing, errors } = useForm({
        pelanggan_id: "",
        bulan: "",
        tahun: "",
        meter_awal: "",
        meter_akhir: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/admin/penggunaan");
    };

    return (
        <>
            <Head title={"Tambah Penggunaan"} />
            <LayoutApp>
                <PageHeader
                    title="Tambah Penggunaan"
                    description="Buat data penggunaan baru"
                />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Pelanggan</FieldLabel>
                            <AppCombobox
                                items={pelangganOptions}
                                value={data.pelanggan_id}
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
                                    value={data.tahun}
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
