import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

export default function PembayaranCreate() {
    const { data, setData, post, processing, errors } = useForm({
        tagihan_id: "",
        pelanggan_id: "",
        tanggal_pembayaran: "",
        bulan_bayar: "",
        biaya_admin: "",
        total_bayar: "",
        user_id: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/admin/pembayarans");
    };

    return (
        <>
            <Head title={"Tambah Pembayaran"} />
            <LayoutApp>
                <PageHeader
                    title="Tambah Pembayaran"
                    description="Buat data pembayaran baru"
                />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Tagihan id</FieldLabel>
                            <Input
                                type="number"
                                value={data.tagihan_id}
                                onChange={(e) =>
                                    setData("tagihan_id", e.target.value)
                                }
                                className={`${errors.tagihan_id ? "border-red-500" : ""}`}
                            />
                            {errors.tagihan_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.tagihan_id}
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
                            <FieldLabel>Tanggal pembayaran</FieldLabel>
                            <Input
                                type="text"
                                value={data.tanggal_pembayaran}
                                onChange={(e) =>
                                    setData(
                                        "tanggal_pembayaran",
                                        e.target.value,
                                    )
                                }
                                className={`${errors.tanggal_pembayaran ? "border-red-500" : ""}`}
                            />
                            {errors.tanggal_pembayaran && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.tanggal_pembayaran}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Bulan bayar</FieldLabel>
                            <Input
                                type="text"
                                value={data.bulan_bayar}
                                onChange={(e) =>
                                    setData("bulan_bayar", e.target.value)
                                }
                                className={`${errors.bulan_bayar ? "border-red-500" : ""}`}
                            />
                            {errors.bulan_bayar && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.bulan_bayar}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Biaya admin</FieldLabel>
                            <Input
                                type="number"
                                value={data.biaya_admin}
                                onChange={(e) =>
                                    setData("biaya_admin", e.target.value)
                                }
                                className={`${errors.biaya_admin ? "border-red-500" : ""}`}
                            />
                            {errors.biaya_admin && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.biaya_admin}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Total bayar</FieldLabel>
                            <Input
                                type="number"
                                value={data.total_bayar}
                                onChange={(e) =>
                                    setData("total_bayar", e.target.value)
                                }
                                className={`${errors.total_bayar ? "border-red-500" : ""}`}
                            />
                            {errors.total_bayar && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.total_bayar}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>User id</FieldLabel>
                            <Input
                                type="number"
                                value={data.user_id}
                                onChange={(e) =>
                                    setData("user_id", e.target.value)
                                }
                                className={`${errors.user_id ? "border-red-500" : ""}`}
                            />
                            {errors.user_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.user_id}
                                </FieldDescription>
                            )}
                        </Field>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/pembayarans">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
