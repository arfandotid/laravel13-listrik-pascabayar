import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

export default function TagihansEdit({ tagihan }) {
    const { data, setData, put, processing, errors } = useForm({
        penggunaan_id: tagihan.penggunaan_id || "",
        pelanggan_id: tagihan.pelanggan_id || "",
        bulan: tagihan.bulan || "",
        tahun: tagihan.tahun || "",
        jumlah_meter: tagihan.jumlah_meter || "",
        status: tagihan.status || "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/admin/tagihan/${tagihan.id}`);
    };

    return (
        <>
            <Head title={"Edit Tagihan"} />
            <LayoutApp>
                <PageHeader
                    title="Edit Tagihan"
                    description="Edit data tagihan"
                />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Penggunaan id</FieldLabel>
                            <Input
                                type="number"
                                value={data.penggunaan_id}
                                onChange={(e) =>
                                    setData("penggunaan_id", e.target.value)
                                }
                                className={`${errors.penggunaan_id ? "border-red-500" : ""}`}
                            />
                            {errors.penggunaan_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.penggunaan_id}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Pelanggan id</FieldLabel>
                            <Input
                                type="number"
                                value={data.pelanggan_id}
                                onChange={(e) =>
                                    setData("pelanggan_id", e.target.value)
                                }
                                className={`${errors.pelanggan_id ? "border-red-500" : ""}`}
                            />
                            {errors.pelanggan_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.pelanggan_id}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Bulan</FieldLabel>
                            <Input
                                type="text"
                                value={data.bulan}
                                onChange={(e) =>
                                    setData("bulan", e.target.value)
                                }
                                className={`${errors.bulan ? "border-red-500" : ""}`}
                            />
                            {errors.bulan && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.bulan}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Tahun</FieldLabel>
                            <Input
                                type="text"
                                value={data.tahun}
                                onChange={(e) =>
                                    setData("tahun", e.target.value)
                                }
                                className={`${errors.tahun ? "border-red-500" : ""}`}
                            />
                            {errors.tahun && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.tahun}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Jumlah meter</FieldLabel>
                            <Input
                                type="number"
                                value={data.jumlah_meter}
                                onChange={(e) =>
                                    setData("jumlah_meter", e.target.value)
                                }
                                className={`${errors.jumlah_meter ? "border-red-500" : ""}`}
                            />
                            {errors.jumlah_meter && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.jumlah_meter}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Status</FieldLabel>
                            <Input
                                type="text"
                                value={data.status}
                                onChange={(e) =>
                                    setData("status", e.target.value)
                                }
                                className={`${errors.status ? "border-red-500" : ""}`}
                            />
                            {errors.status && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.status}
                                </FieldDescription>
                            )}
                        </Field>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/tagihan">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
